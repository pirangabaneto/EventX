<?php

namespace App\Http\Controllers;
use App\Models\Salao;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Estrutura;
use PDF;
use DateTime;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        $saloes = [];
        $estruturasPorReserva = [];

        foreach ($reservas as $reserva) {
            $salao = Salao::find($reserva->salao_comercial_id);
            $saloes[] = $salao;

            $estruturas = $reserva->estruturas;
            $estruturasPorReserva[$reserva->id] = $estruturas;
        }
        
        return view('reservas.index', compact('reservas', 'saloes', 'estruturasPorReserva'));
    }

    public function create()
    {
        $saloes = Salao::all();
        $clientes = Cliente::all();
        $estruturasAdicionais = Estrutura::where('is_adicional', 1)->get();
        
        return view('reservas.create', compact('saloes', 'clientes', 'estruturasAdicionais'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'valor' => 'required|numeric',
            'horario_inicial' => 'required|date',
            'horario_final' => 'required|date|after:horario_inicial',
            'quantidade_recepcionistas' => 'nullable|integer',
            'salao_comercial_id' => 'required|exists:salaos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'coffe_break' => 'nullable|string',
            'numero_participantes' => 'required|integer',
        ]);

        $salao = Salao::find($validatedData['salao_comercial_id']);

        if ($salao->limite_participantes < $validatedData['numero_participantes']) {
            return back()->withErrors(['numero_participantes' => 'Número de participantes excede o limite permitido.']);
        }

        $temRecepcao = $request->has('tem_recepcao') ? 1 : 0;
        $temCoffeBreak = $request->has('tem_coffe_break') ? 1 : 0;

        $horarioInicial = new DateTime($validatedData['horario_inicial']);
        $horarioFinal = new DateTime($validatedData['horario_final']);

        $horarioInicialSalao = new DateTime($salao->horario_inicial);
        $horarioFinalSalao = new DateTime($salao->horario_final);
        
        if ($horarioInicial->format('H:i:s') < $horarioInicialSalao->format('H:i:s')) {
            return back()->withErrors(['horario_inicial' => 'Horário fora do intervalo de funcionamento.']);
        }
        if ($horarioFinal->format('H:i:s') > $horarioFinalSalao->format('H:i:s')) {
            return back()->withErrors(['horario_final' => $horarioFinal]);
        }

        $reservasSobreposicao = Reserva::where('salao_comercial_id', $salao->id)
        ->where('horario_final', '>=', $horarioInicial->modify('-1 hour'))
        ->where('horario_inicial', '<=', $horarioFinal->modify('+1 hour'))
        ->get();

        if (!$reservasSobreposicao->isEmpty()) {
            return back()->withErrors(['horario_inicial' => 'Horário indisponivel.']);
        }

        $data = new Reserva([
            'valor' => $validatedData['valor'],
            'horario_inicial' => $validatedData['horario_inicial'],
            'horario_final' => $validatedData['horario_final'],
            'quantidade_recepcionistas' => $validatedData['quantidade_recepcionistas'],
            'salao_comercial_id' =>  $validatedData['salao_comercial_id'],
            'cliente_id' => $validatedData['cliente_id'],
            'coffe_break' => $validatedData['coffe_break'],
            'tem_recepcao' => $temRecepcao,
            'tem_coffe_break' => $temCoffeBreak,
        ]);
        
        $data->save();

        if ($request->has('estruturas_adicionais')) {
            $estruturasAdicionais = $request->input('estruturas_adicionais');
            $data->estruturas()->sync($estruturasAdicionais);
        }

        return redirect()->route('reservas.create')->with('success', 'Reserva realizada com sucesso!');
    }

    public function generatePDF($id)
    {
        $reserva = Reserva::findOrFail($id);
        $salao = Salao::findOrFail($reserva->salao_comercial_id);

        $estruturasAdicionais = $reserva->estruturas;

        $pdfName = 'reserva_' . $reserva->id . '.pdf';

        $pdf = PDF::loadView('reservas.pdf', compact('reserva', 'salao', 'estruturasAdicionais'));

        $pdf->save(public_path('pdf/' . $pdfName));

        return $pdf->download($pdfName);
    }

    public function grafico()
    {
        // Busque todas as reservas do banco de dados
        $reservas = Reserva::all();

        // Inicialize o array $occupancyData
        $occupancyData = [];

        // Preencha o array $occupancyData com as colunas horario_inicial e horario_final
        foreach ($reservas as $reserva) {
            // Converta as datas para o formato desejado (você pode ajustar isso conforme necessário)
            $inicio = date('Y-m-d', strtotime($reserva->horario_inicial));
            $fim = date('Y-m-d', strtotime($reserva->horario_final));

            // Incrementar o valor para cada dia entre as datas
            while ($inicio <= $fim) {
                if (!isset($occupancyData[$inicio])) {
                    $occupancyData[$inicio] = 1;
                } else {
                    $occupancyData[$inicio]++;
                }
                $inicio = date('Y-m-d', strtotime($inicio . ' +1 day'));
            }
        }

        return view('reservas.grafico', compact('occupancyData'));
    }
}

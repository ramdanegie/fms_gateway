<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fcl->quote_no }}</title>
    <style>
        table {
            width: 100%;
        }

        table td, table th {}
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="3">PT. GATEWAY CONTAINER LINE </th>
            </tr>
            <tr>
                <th colspan="3">GCL BUILDING</th>
            </tr>
            <tr>
                <th colspan="3">Jl. Otista III No. 18 Jakarta Timur13340 DKI</th>
            </tr>
            <tr>
                <th colspan="3">Tel/Fax. 021-85918669/85918664 </th>
            </tr>
            <tr>
                <th colspan="3" style="height: 30px"></th>
            </tr>
            <tr>
                <th colspan="3"><h2>BOOKING CONFIRMATION</h2></th>
            </tr>
            <tr>
                <th colspan="3" style="height: 30px"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 200px">REFERENSI NUMBER </td>
                <td style="width: 10px">:</td>
                <td style="width: 100%">{{ $fcl->quote_no }}</td>
            </tr>
            <tr>
                <td style="width: max-content">DATE </td>
                <td style="width: 10px">:</td>
                <td>{{ $fcl->created_at->format("d F Y") }}</td>
            </tr>
            <tr>
                <td style="width: max-content">SHIPPER </td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->shippingInstruction->shipper->shipper_name }}</td>
            </tr>
            <tr>
                <td style="width: max-content">CONSIGNEE </td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->shippingInstruction->consignee->consignee_name }}</td>
            </tr>
            <tr>
                <td style="width: max-content">DESC OF GOODS</td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->shippingInstruction->goods_description }}</td>
            </tr>
            <tr>
                <td style="width: max-content">PARTY</td>
                <td style="width: 10px">:</td>
                <td>{{ config("quotation_types")[$fcl->quote_type] . strtoupper(" ($fcl->quote_type)") }}</td>
            </tr>
            <tr>
                <td style="width: max-content">GW /NW</td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->cargos->pluck("cargo_total_weight")->join("/") }}</td>
            </tr>
            <tr>
                <td style="width: max-content">PORT OF RECEIPT</td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->origin->name }}</td>
            </tr>
            <tr>
                <td style="width: max-content">PORT OF LOADING </td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->origin->name }}</td>
            </tr>
            <tr>
                <td style="width: max-content">DESTINATION </td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->destination->name }}</td>
            </tr>
            <tr>
                <td style="width: max-content">AGENT AT DEST </td>
                <td style="width: 10px">:</td>
                <td>{{ @$fcl->destination->address }}</td>
            </tr>
            <tr>
                <td style="width: max-content">SCHEDULE </td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">FEDEER VSL  </td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">ETD JKT</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">ETA HKG</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">CUTT OFF TIME</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">DOC</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">CARGO</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">CONTIANER NUMBER</td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">TERM </td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: max-content">Estimated Actual Schedule </td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 50px"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">
                    Jakarta, {{ now()->format("D F Y") }}
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    ......&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
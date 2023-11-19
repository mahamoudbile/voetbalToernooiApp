<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gespeelde wedstrijden') }}
        </h2>
    </x-slot>
        
    <div class="py_result">
        <div class="img_result">
            <div class="img_overlay">
                <h1 class="text-lg h2_result py-4">Stand</h1>
                <div class="table_scrol">
                    <table id="table_result">
                        <tr id="header">
                            <th>Teams</th>
                            <th>Gewonnen</th>
                            <th>Gelijk</th>
                            <th>Verloren</th>
                            <th>Punten</th>
                        </tr>
                        @foreach($teams_result as $result)
                            <tr>
                                <td>{{$result->team_name}}</td>
                                <td>{{$result->won}}</td>
                                <td>{{$result->draw}}</td>
                                <td>{{$result->lost}}</td>
                                <td>{{$result->pts}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>



<x-layout title="Editar Série: {{$series->nome}}">
    <x-series.form action="{{route('series.update', $series)}}" nomeBotao="{{'Editar'}}" nome="{{$series->nome}}"/>
</x-layout>

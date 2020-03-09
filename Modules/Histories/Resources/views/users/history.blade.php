@foreach($histories as $history)

<div>
  Changed: <strong>{{ $history->changed_column }}</strong>
  From: <strong>{{ $history->changed_value_from }}</strong>
  To: <strong>{{ $history->changed_value_to }}</strong>
  on: <strong> {{ $history->created_at}}</strong>
</div>

@endforeach

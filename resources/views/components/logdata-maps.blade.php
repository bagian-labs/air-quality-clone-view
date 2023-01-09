@extends('default-pages')
@push('styles')
@endpush
@section('content')
    {{-- Wrapper Content --}}
    <div class="log__data__wrapper log__data__container">
        <div class="log__wrapper">
            <div class="log__header">
                <ion-icon name="server-sharp" class="ion-icon__setting" style="margin-right: 10px;">
                </ion-icon>
                Log Data :
            </div>
            <div class="log__content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">CO</th>
                            <th scope="col">CO<sup>2</sup>
                            </th>
                            <th scope="col">TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @php(date_default_timezone_set('Asia/Jakarta'))
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>{{ $log->data()['co'] }}</td>
                                <td>{{ $log->data()['co2'] }}</td>
                                @php($val = \Carbon\Carbon::parse($log->data()['time'])->format('Y-m-d H:i:s'))
                                <td>{{ date('d F Y - H:i:s', strtotime("$val UTC")) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

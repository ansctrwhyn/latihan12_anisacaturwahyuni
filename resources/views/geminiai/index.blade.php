@extends('layouts.app')

@section('content')

<body class="bg-dark">
    <div class="container mt-5">
        <h1 class="text-light">Chatbot</h1>
        <table id="chatHistoryTable" class="table table-striped table-bordered text-light mb-5">
            <thead>
                <tr>
                    <th>Send Chat</th>
                    <th>Get Chat</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            @foreach ($history_chat as $item)
                <tr>
                    <td>{{ $item->send_chat }}</td>
                    <td>{{ $item->get_chat }}</td>
                    <!-- <td>
                                <a href="{{ route('history_chat.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('history_chat.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td> -->
                </tr>
            @endforeach
        </table>
        <div class="mt-5">
            <div class="row">
                <div class="col-12">
                    @foreach ($history_chat as $item)
                        <div class="d-flex align-items-center justify-content-start mb-4">
                            <div class="chat-bubble chat-bubble-left">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->send_chat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <div class="chat-bubble chat-bubble-right">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->get_chat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form action="{{ route('history_chat.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="form-label text-light">Message</label>
                        <input type="text" class="form-control" id="message" name="message"
                            placeholder="Type your message here" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>

                @if (session('response'))
                    <div class="mt-4">
                        <h4>Chatbot Response : </h4>
                        <div class="alert alert-info">
                            <!-- {{ session('response') }} -->
                            {!! Str::markdown(session('response')) !!}
                        </div>
                    </div>
                @endif
            </div>

</body>
@endsection
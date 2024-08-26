@extends('layouts.app')

@section('content')

<body class="bg-dark">
    <div class="container mt-5">
        <h1 class="text-light">Chatbot</h1>
        <form action="{{ url('/geminiai') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label text-light">Message</label>
                <input type="text" class="form-control" id="message" name="message" placeholder="Type your message here"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

        @if (session('response'))
            <div class="mt-4">
                <h4>Chatbot Response : </h4>
                <div class="alert alert-info">
                    {{ session('response') }}
                </div>
            </div>
        @endif
    </div>

</body>
@endsection
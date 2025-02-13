<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="{{ asset('styles/app.css') }}" rel="stylesheet">
</head>

<body>
    <h1>Simple Calculator</h1>
    <div class="container">
        @if(session('error'))
        <div class="badge-error">
            ❌ <strong>Error : </strong> {{ session('error') }}
        </div>
        @endif

        <form action="/calculator" method="POST">
            @csrf
            <div class="input-group">
                <input type="number" name="number1" value="{{ old('number1', $number1 ?? '') }}" required placeholder="Enter first number">
            </div>

            <div class="input-group">
                <select name="operation" required>
                    <option value="add" {{ (old('operation', $operation ?? '') == 'add') ? 'selected' : '' }}>➕ Addition</option>
                    <option value="subtract" {{ (old('operation', $operation ?? '') == 'subtract') ? 'selected' : '' }}>➖ Subtraction</option>
                    <option value="multiply" {{ (old('operation', $operation ?? '') == 'multiply') ? 'selected' : '' }}>✖️ Multiplication</option>
                    <option value="divide" {{ (old('operation', $operation ?? '') == 'divide') ? 'selected' : '' }}>➗ Division</option>
                </select>
            </div>

            <div class="input-group">
                <input type="number" name="number2" value="{{ old('number2', $number2 ?? '') }}" required placeholder="Enter second number">
            </div>

            <button type="submit">Calculate</button>
        </form>

        @if(session('result'))
        <div class="result">
            ✅ <strong>Result: </strong>{{ session('result') }}
        </div>
        @endif

        @if($errors->any())
        <ul class="error-list">
            @foreach($errors->all() as $error)
            <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</body>

</html>
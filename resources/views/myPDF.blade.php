<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Offer Letter</title>
</head>
<body>
    <h1>Offer Letter</h1>
    <p>Dear  {{ $cname }} </p>
    <p>We are pleased to offer you the position of {{ $position }} at a salary of {{ $salary }} per month.</p>
    <p>Please sign and return the attached copy of this letter to indicate your acceptance of this offer.</p>
    <p>Sincerely,</p>
    <p>HR Manager</p>
    <br>
    <br>
    <div>    
    <img src="{{ url('storage/signature/'.$name) }}" style="width: 200px; height: 200px">
    <div style="border-top: 1px solid black; width: 200px;"></div>

    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Signature</p>
</body>
</html>

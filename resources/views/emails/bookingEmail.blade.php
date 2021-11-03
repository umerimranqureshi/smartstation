<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
padding: 5px;
text-align: left;
}
</style>
</head>
<body>
<h2>Hello Admin,</h2>
You received an email from : {{$data['name']}} <br>
Here are the details:
<br>
<table class="table table-striped" style="width:65%;">
<tr>
<th>Name:</th>
<td>{{$data['name']}}</td>
</tr>
<tr>
<th>Email:</th>
<td>{{$data['email']}}</td>
</tr>
<tr>
<th>Number:</th>
<td>{{$data['number']}}</td>
</tr>
<tr>
<th>Device:</th>
<td>{{$data['device']}}</td>
</tr>
<tr>
<th>Model:</th>
<td>{{$data['model']}}</td>
</tr>
<tr>
<th>Issue:</th>
<td>{{$data['issue']}}</td>
</tr>
<tr>
<th>Message:</th>
<td>{{$data['message']}}</td>
</tr>
<tr>
</table>
<br>
<b>Thank You</b>
</body>
</html>




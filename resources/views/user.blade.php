<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.success:hover {
  background-color: #6666ff;
  color: white;
}
.btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
</style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             <form method="get" action="{{ route('search') }}">
             @csrf
             <div class="form-group">
                    <input type="text" name="q" placeholder="Search...!" class="form-control" style="padding: 10px;"/>
                    <input type="submit" value="Search"  class="btn success"/>
             </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
  @foreach($userlist as $value)
  <tr>
    <td>{{$value['name']}}</td>
    <td>{{$value['score']}}</td>
  </tr>
  @endforeach
</table>

{{ $userlist->links() }}

            </div>
        </div>
    </div>
</x-app-layout>

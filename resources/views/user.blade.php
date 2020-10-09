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
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
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
                    <input type="text" name="q" placeholder="Search...!" class="form-control"0 style="padding: 10px;"/>
                    <input type="submit" value="Search"  class="btn success"/>
                    <div class="dropdown">
                    <button class="dropbtn" disabled>Sort By Score</button>
                    <div class="dropdown-content">
                      <a href="{{ route('sort','desc') }}">Desc</a>
                      <a href="{{ route('sort','asc') }}">Asc</a>
                    </div>
                  </div>
             </div>
             <table>
                 <tr>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
                @foreach($userlist as $value)
                <tr>
                @if($value['score']>=5)
                  <td style="color:green"><b>{{$value['name']}}</b></td>
                  @else
                  <td style="color:red"><b>{{$value['name']}}</b></td>
                  @endif
                  @if($value['score']>=5)
                  <td style="color:green"><b>{{$value['score']}}</b></td>
                  @else
                  <td style="color:red"><b>{{$value['score']}}</b></td>
                  @endif
                </tr>
                @endforeach
              </table>

{{ $userlist->links() }}

            </div>
        </div>
    </div>
</x-app-layout>

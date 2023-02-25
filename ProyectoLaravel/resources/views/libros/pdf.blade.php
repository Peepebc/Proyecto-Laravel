<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .header{
            color: white;
            background-color: rgb(48, 48, 48);
        }
        tbody {
            background-color: rgba(189, 189, 189, 0.356);
            color: black;
  }
  td{
    text-align: center;
  }

    </style>
</head>
<body>
        <table style="width:100%">
                <tr class="header">
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                </tr>
            <tbody>
                @foreach ($libros as $libro)
                <tr style="border:1px solid black;">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$libro->titulo}}
                    </th>
                    <td class="px-6 py-4">
                        {{$libro->autor}}
                    </td>
                    <td class="px-6 py-4">
                        {{$libro->anio}}
                    </td>
                    <td class="px-6 py-4">
                        {{$libro->descripcion}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white py-2">Master Organization</h1>
        <a href="{{ route('organization.create') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Organization</a>
    </div>
    <table id="filter-table">
        <thead>
            <tr>
                <th>
                    <span class="flex items-center">
                        Organization Code
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Organization Name
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
                <th class="no-filter">
                    <span class="flex items-center">
                        Action
                    </span>
                </th>

            </tr>
        </thead>
        <tbody>
        @foreach ($queryset as $organization)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $organization->organization_code }}</td>
                        <td>{{ $organization->organization_name }}</td>
                        <td class="px-2 py-2 border-b border-gray-200 flex space-x-2">
                            <a href="{{ route('organization.edit',  ['id' => $organization->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                            <form action="{{ route('organization.destroy', $organization->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="outline-none text-white bg-red-700 
                                hover:bg-red-800 focus:ring-4 
                                focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>

<script>
if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#filter-table", {
        tableRender: (_data, table, type) => {
            if (type === "print") {
                return table;
            }
            const tHead = table.childNodes[0];
            const filterHeaders = {
                nodeName: "TR",
                attributes: {
                    class: "search-filtering-row"
                },
                childNodes: tHead.childNodes[0].childNodes.map((_th, index) => {
                    // Check if the <th> has a specific class to add the input filter
                    const thClassList = _th.attributes.class ? _th.attributes.class.split(' ') : [];
                    const shouldAddFilter = thClassList.includes("no-filter"); // Change "filterable" to your desired class

                    if (!shouldAddFilter) {
                        return {
                            nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]"
                                    }
                                }
                            ]
                        };
                    } else {
                        return { nodeName: "TH", childNodes: [] }; // Return an empty TH if no filter is needed
                    }
                })
            };
            tHead.childNodes.push(filterHeaders);
            return table;
        }
    });
}

</script>

@endsection


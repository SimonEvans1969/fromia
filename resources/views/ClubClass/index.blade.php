<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>
    <div class="container justify-center">
        <div class="p-12 flex">
            <table id="clubclasses" class="border-solid border-gray-700">
                <thead class="bg-blue-900 text-white w-full">
                    <tr class="w-full">
                        <td class="p-2 border border-solid border-gray-700">Code</td>
                        <td class="p-2 border border-solid border-gray-700">Name</td>
                        <td class="hidden sm:table-cell p-2 border border-solid border-gray-700">Description</td>
                        <td class="p-2 border border-solid border-gray-700">Status</td>
                        <td class="hidden md:table-cell p-2 border border-solid border-gray-700">Capacity</td>
                    </tr>
                </thead>
                <tbody class="items-center justify-between overflow-y-scroll w-full">
                    @foreach( $clubclasses as $clubclass )
                        <tr class="w-full p-2" target-id="{{$clubclass->id}}">
                            <td class="p-2 border border-solid border-gray-700">{{$clubclass->code}}</td>
                            <td class="p-2 border border-solid border-gray-700">{{$clubclass->name}}</td>
                            <td class="hidden sm:table-cell p-2 border border-solid border-gray-700">{{$clubclass->description}}</td>
                            <td class="p-2 border border-solid border-gray-700">{{$clubclass->status}}</td>
                            <td class="hidden md:table-cell p-2 border border-solid border-gray-700">{{$clubclass->capacity}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" defer>
        window.addEventListener('load', function () {

            setTableHeight();
            $(window).resize(function(){
                setTableHeight();
            });

            $('#clubclasses').on('click', 'tr', function () {
                window.location.href = "{{url('clubclasses')}}/" + $(this).prop('target-id');
            } );
        });

        function setTableHeight() {
            var otherHeight = $('body').height() - $('.dataTables_scrollBody').height();
            var tableHeight = $(window).height() - otherHeight - 1;
            tableHeight = Math.max(200, tableHeight);
            $('.dataTables_scrollBody').css('height', tableHeight + 'px');
        }

    </script>
</x-app-layout>


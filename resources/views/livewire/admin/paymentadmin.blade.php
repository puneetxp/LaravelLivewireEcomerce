<div class="  shadow-lg bg-gray-200  text-gray-600">
    <div class="mx-2  font-bold">
        @livewireStyles
        <form wire:submit.prevent='create' class="py-2 py-0 text-xl w-1/2  font-bold ">
            <input wire:model="name" / style="border:2px solid; padding:0.5rem; color:gray;  border-radius:4px;"><!-- comment -->
            <input wire:model='status' type="checkbox" checked / style="border: 2px solid;  margin-left:6px; margin-right:6px; margin-top:6px; padding:0.8rem; color:gray;">
            <button class=" mt-4 bg-transparent hover:bg-gray-600 text-gray-600 font-semibold hover:text-white py-1  px-4 border border-gray-600 hover:border-transparent rounded">
                Submit
            </button>
        </form>
        <div class="mx-2 bg-gray-200 py-4">
            <table border="1">

                <thead>

                    <tr>
            
                        <th class="text-2xl  text-left">Payment</th>

                        <th class="text-2xl   ">Active</th>

                    </tr>

                </thead>

                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td class="text-lg">{{$payment->name}}</td>
                        <td><input wire:click="updates({{$payment->status}},{{$payment->id}})" type='checkbox' class=" text-lg text-gray-600  mx-2" @if($payment->status)
                            checked
                            @endif
                            >
                            <input type="button" value="Delete" class="bg-gray-200 text-gray-600 text-lg font-bold " name="delete" type="button" wire:click="destroys({{$payment->id}})" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        @livewireScripts
    </div>
</div>
<x-app-layout>
    <div class="container sm:pt-8 mx-auto max-w-7xl px-4">
        <div class="sm:col-span-2">
            <div class="mx-auto" >
                <div class="sm:px-5 py-2">
                    <h3 class="text-2xl font-bold"> RazorPay </h3>
                    <form class="grid gap-2" action="{{ route('admin.enviroment.store') }}" method="post">
                        <div>
                            <x-jet-label for="RAZORPAY_KEY"  :value="__('RAZORPAY_KEY')" />
                            <x-jet-input id='RAZORPAY_KEY' name="RAZORPAY_KEY" :value="__($_ENV['RAZORPAY_KEY'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        <div>
                            <x-jet-label for="RAZORPAY_SECRET" :value="__('RAZORPAY_SECRET')" />
                            <x-jet-input id='RAZORPAY_SECRET' name="RAZORPAY_SECRET"  :value="__($_ENV['RAZORPAY_SECRET'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        @csrf
                        <x-jet-button class="ml-auto">
                            {{ __('Update RazorPay') }}
                        </x-jet-button>
                    </form>
                </div>
                <div class="sm:px-5 py-2">
                    <h3 class="text-2xl font-bold"> Order Shipment </h3>
                    <form class="grid gap-2" action="{{ route('admin.enviroment.store') }}" method="post">
                        <div>
                            <x-jet-label for="minorder"  :value="__('Min Order Value')" />
                            <x-jet-input id='minorder' name="ORDER_MIN" :value="__($_ENV['ORDER_MIN'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        <div>
                            <x-jet-label for="shipment" :value="__('Flat Shipping Price')" />
                            <x-jet-input id='shipment' name="ORDER_SHIP"  :value="__($_ENV['ORDER_SHIP'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        @csrf
                        <x-jet-button class="ml-auto">
                            {{ __('Update RazorPay') }}
                        </x-jet-button>
                    </form>
                </div>

                <div class="sm:px-5 py-2">
                    <h3 class="text-2xl font-bold"> Google Location API </h3>
                    <form class="grid gap-2" action="{{ route('admin.enviroment.store') }}" method="post">
                        <div>
                            <x-jet-label for="GoogleLocation"  :value="__('Google Location API')" />
                            <x-jet-input id='GoogleLocation' name="GOOGLE_LOCATION_API" :value="__($_ENV['GOOGLE_LOCATION_API'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        @csrf
                        <x-jet-button class="ml-auto">
                            {{ __('Update Pixel ID') }}
                        </x-jet-button>
                    </form>
                </div>
                <div class="sm:px-5 py-2">
                    <h3 class="text-2xl font-bold"> Set Email ID </h3>
                    <form class="grid gap-2" action="{{ route('admin.enviroment.store') }}" method="post">
                        <div>
                            <x-jet-label for="EMAIL_ID"  :value="__('EMAIL ID')" />
                            <x-jet-input id='EMAIL_ID' name="EMAIL_ID" :value="__($_ENV['EMAIL_ID'])" class="w-full rounded-md" type="text" required  />
                        </div>
                        @csrf
                        <x-jet-button class="ml-auto">
                            {{ __('Update Email ID') }}
                        </x-jet-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

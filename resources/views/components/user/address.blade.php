<div x-show="add" x-transition class="absolute inset-0 m-auto">
    <div class="bg-gray-100/80 fixed inset-0 flex items-center h-full self-center m-auto xl:p-20 sm:p-5 p-2 z-20 rounded" style="overflow:auto;">
        <div class="md:max-w-lg sm:max-w-md bg-slate-300/90 rounded-md m-auto">
            <nav class=" w-full h-10 rounded-md xl:max-w-screen-xl mx-auto  p-2">
                <div class="bg-red-50 shadow-lg rounded-full w-10 ml-auto py-1 text-3xl close rotate-45 transform-gpu flex justify-center">
                    <a class="cursor-default" @click="add=false">+</a>
                </div>
            </nav>
            <div x-data="{ form:{pincode:'', state:'',district:'',line:'',phone:'{{Auth::user()->phone}}',email:'{{Auth::user()->email}}'},pins:false , all: []}" 
                 class="p-2 rounded-md">
                <form class="flex flex-wrap" 
                      @submit.prevent="form['_token']='{{ csrf_token() }}' ; addresses = await fetch('/user/address',{method: 'POST', headers: { 'Content-Type': 'application/json' },body: JSON.stringify(form)}).then(response => response.json()) ; add=false; form ={pincode:'',state:'',district:'',line:''}">
                    <div class="grid w-full p-2 relative" ">
                        <x-jet-label for="name" :value="__('Name')" />
                        <x-jet-input id="name"  
                                     class="block mt-1 w-full" type="text" x-model='form.name' name="name" value="" autofocus required/>
                    </div>
                    <div class="grid w-full p-2 relative" ">
                        <x-jet-label for="pincode" :value="__('Pincode')" />
                        <x-jet-input id="pincode"  
                                     class="block mt-1 w-full" type="text" x-model='form.pincode' name="pincode" value="" autofocus required/>
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="state" :value="__('State')"  />
                        <x-jet-input id="state" class="block mt-1 w-full" x-model='form.state' type="text" autofocus required/>
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="district" :value="__('District')" />
                        <x-jet-input id="district" class="block mt-1 w-full" type="text" x-model="form.district" autofocus required/>
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="line" :value="__('Address')" />
                        <x-jet-input id="line" class="block mt-1 w-full" type="text" x-model="form.line" autofocus required />
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="ph" :value="__('Phone No')" />
                        <x-jet-input id="ph" class="block mt-1 w-full" value="{{Auth::user()->phone}}" type="tel" pattern="[0-9]{10}" x-model="form.phone" autofocus required/>
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="al" :value="__('Alternate No(optional)')" />
                        <x-jet-input id="al" class="block mt-1 w-full" type="tel" pattern="[0-9]{10}" x-model="form.alternate" autofocus />
                    </div>
                    <div class="grid w-full p-2">
                        <x-jet-label for="al" :value="__('Email Id')" />
                        <x-jet-input id="al" class="block mt-1 w-full" value="{{Auth::user()->email}}" type="email" x-model="form.email" autofocus required />
                    </div>
                    <div class="grid w-full p-2">
                        <input class="bg-gray-200 text-gray-800 p-2 rounded-md" type="submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
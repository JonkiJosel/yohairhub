<div id="reservationForm" class="reservation-form-wrap pt-5">
    <h3 class="mb-5">Make a Reservation</h3>
    <form wire:submit.prevent="" method="post" class="p-5 bg-light">
        @csrf
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Full Name Field -->
        <div class="form-group">
            <label for="customerName">Full Name *</label>
            <input wire:model="customerName" type="text" class="form-control" id="customerName" required>
            @error('customerName')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email and Phone Number Fields -->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="customerEmail">Email</label>
                    <input wire:model="customerEmail" type="email" class="form-control" id="customerEmail">
                    @error('customerEmail')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="customerPhone">Phone Number</label>
                    <input wire:model="customerPhone" type="text" class="form-control" id="customerPhone">
                    @error('customerPhone')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Date and Time Fields -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="reservationDate">Date *</label>
                    <input wire:model="reservationDate" type="date" class="form-control" id="reservationDate" required>
                    @error('reservationDate')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="reservationTime">Time</label>
                    <input wire:model="reservationTime" type="time" class="form-control" id="reservationTime">
                    @error('reservationTime')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Hair Style and Service Fields -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="selectedHairstyle">Hair Style</label>
                    <select wire:model="selectedHairstyle" class="form-control" id="selectedHairstyle">
                        <option value="">-- Select Hair Style --</option>
                        @forelse ($salon->hairstyles as $hairstyle)
                            <option value="{{ $hairstyle->id }}">{{ $hairstyle->hairStyle->name }}</option>
                        @empty
                            <option value="">-- No Hair Styles Available --</option>
                        @endforelse
                    </select>
                    @error('selectedHairstyle')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="selectedService">Service</label>
                    <select wire:model="selectedService" class="form-control" id="selectedService">
                        <option value="">-- Select Service --</option>
                        @forelse ($salon->services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            <option value="">-- No Services Available --</option>
                        @endforelse
                    </select>
                    @error('selectedService')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Special Request Field -->
        <div class="form-group">
            <label for="specialRequests">Special Request</label>
            <textarea wire:model="specialRequests" id="specialRequests" class="form-control" cols="30" rows="4"></textarea>
            @error('specialRequests')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button wire:click="makeReservation" class="btn py-3 px-4 btn-primary">Send</button>
        </div>
    </form>
</div>

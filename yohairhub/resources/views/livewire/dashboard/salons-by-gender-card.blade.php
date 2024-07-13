<div class="p-4 bg-white rounded shadow">
    <h2 class="text-xl font-semibold">Salons by Gender</h2>
    <ul>
        @foreach($salonsByGender as $gender => $count)
            <li>{{ ucfirst($gender) }}: {{ $count }}</li>
        @endforeach
    </ul>
</div>
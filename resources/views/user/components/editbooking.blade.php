<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/userbooking.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> --}}
    <title>USER</title>
</head>
<style>
    .back-button {
  position: fixed;
  top: 10px;
  left: 20px;
  background-color: #333;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
}

.back-button:hover {
  background-color: #444;
}

.back-button i {
  margin-right: 5px;
}
</style>
<body>
    @include('user.components.header') <!-- Include sidebar component -->
    @include('user.components.sidebar') <!-- Include navbar component -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Kapag binago ang origin, destination, o vehicle
    $('select[name="origin"], select[name="destination"], select[name="vehicle_type"]').change(function() {
        // Kumuha ng halagang random na presyo kung may napili na ang user para sa mga ito
        if ($('select[name="origin"]').val() && $('select[name="destination"]').val() && $('select[name="vehicle_type"]').val()) {
            var randomPrice = Math.floor(Math.random() * 50) + 50; // Random price between 50 and 100 pesos
            $('input[name="price"]').val(randomPrice.toFixed(2)); // Format the number with 2 decimal places and add the peso sign
        } else {
            $('input[name="price"]').val(''); // Clear the price if origin, destination, or vehicle is not selected
        }
    });

    // Add the following line to handle the change event on the booking_date input
    $('input[name="booking_date"]').change(function() {
        // If booking_date is changed, enable the submit button
        $('button[type="submit"]').prop('disabled', false);
    });
});
</script>
<div class="container">

<form action="{{ route('journey.update', $journey->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form first">
        <div class="details personal">
            <div class="fields">
                <div class="input-field">
                    <label>Select Date</label>
                    <input type="date" name="booking_date" value="{{ $journey->booking_date }}" required>
                </div>
                <div class="input-field">
                    <label>Origin</label>
                    <select name="origin" required>
                        <option value="">Choose Origin</option>
                        <option value="aningway_sacatihan" {{ $journey->origin == 'aningway_sacatihan' ? 'selected' : '' }}>Aningway Sacatihan</option>
                        <option value="asinan_poblacion" {{ $journey->origin == 'asinan_poblacion' ? 'selected' : '' }}>Asinan Poblacion</option>
                        <option value="asinan_proper" {{ $journey->origin == 'asinan_proper' ? 'selected' : '' }}>Asinan Proper</option>
                        <option value="baraca_camachile" {{ $journey->origin == 'baraca_camachile' ? 'selected' : '' }}>Baraca-Camachile (Pob.)</option>
                        <option value="batiawan" {{ $journey->origin == 'batiawan' ? 'selected' : '' }}>Batiawan</option>
                        <option value="calapacuan" {{ $journey->origin == 'calapacuan' ? 'selected' : '' }}>Calapacuan</option>
                        <option value="calapandayan" {{ $journey->origin == 'calapandayan' ? 'selected' : '' }}>Calapandayan (Pob.)</option>
                        <option value="cawag" {{ $journey->origin == 'cawag' ? 'selected' : '' }}>Cawag</option>
                        <option value="ilwas" {{ $journey->origin == 'ilwas' ? 'selected' : '' }}>Ilwas (Pob.)</option>
                        <option value="mangan_vaca" {{ $journey->origin == 'mangan_vaca' ? 'selected' : '' }}>Mangan-Vaca</option>
                        <option value="matain" {{ $journey->origin == 'matain' ? 'selected' : '' }}>Matain</option>
                        <option value="naugsol" {{ $journey->origin == 'maugsol' ? 'selected' : '' }}>Naugsol</option>
                        <option value="pamatawan" {{ $journey->origin == 'pamatawan' ? 'selected' : '' }}>Pamatawan</option>
                        <option value="san_isidro" {{ $journey->origin == 'san_isidro' ? 'selected' : '' }}>San Isidro</option>
                        <option value="santo_tomas" {{ $journey->origin == 'santo_tomas' ? 'selected' : '' }}>Santo Tomas</option>
                        <option value="wawandue" {{ $journey->origin == 'wawandue' ? 'selected' : '' }}>Wawandue (Pob.)</option>
                        <option value="Asinan" {{ $journey->origin == 'asinan' ? 'selected' : '' }}>Asinan</option>
                        <option value="banicain" {{ $journey->origin == 'banicain' ? 'selected' : '' }}>Banicain</option><option value="Barreto">Barreto</option>
                        <option value="East_Bajac-bajac" {{ $journey->origin == 'East_Bajac-bajac' ? 'selected' : '' }}>East Bajac-bajac</option>
                        <option value="East_Tapinac" {{ $journey->origin == 'east_tapinac' ? 'selected' : '' }}>East Tapinac</option>
                        <option value="Gordon_Heights" {{ $journey->origin == 'gordon_heights' ? 'selected' : '' }}>Gordon Heights</option>
                        <option value="Kalaklan" {{ $journey->origin == 'kalaklan' ? 'selected' : '' }}>Kalaklan</option>
                        <option value="Mabayuan" {{ $journey->origin == 'mabayuan' ? 'selected' : '' }}>Mabayuan</option>
                        <option value="New_Cabalan" {{ $journey->origin == 'new_cabalan' ? 'selected' : '' }}>New Cabalan</option>
                        <option value="New_Ilalim" {{ $journey->origin == 'new_ilalim' ? 'selected' : '' }}>New Ilalim</option>
                        <option value="New_Kababae" {{ $journey->origin == 'new_kababae' ? 'selected' : '' }}>New Kababae</option>
                        <option value="New_Kalalake" {{ $journey->origin == 'new_kalalake' ? 'selected' : '' }}>New Kalalake</option>
                        <option value="Old_Cabalan" {{ $journey->origin == 'old_cabalan' ? 'selected' : '' }}>Old Cabalan</option>
                        <option value="Pag-asa"> {{ $journey->origin == 'pag-asa' ? 'selected' : '' }}Pag-asa</option>
                        <option value="Santa_Rita" {{ $journey->origin == 'santa_rita' ? 'selected' : '' }}>Santa Rita</option>
                        <option value="West_Bajac-bajac" {{ $journey->origin == 'west_bajac-bajac' ? 'selected' : '' }}>West Bajac-bajac</option>
                        <option value="West_Tapina" {{ $journey->origin == 'west_tapinac' ? 'selected' : '' }}>West Tapina</option>
                     </select>
                </div>
                <div class="input-field">
                    <label>Destination</label>
                    <select name="destination" required>
                        <option value="">Choose Destination</option>
                        <option value="iba" {{ $journey->destination == 'iba' ? 'selected' : '' }}>Iba</option>
                        <option value="botolan" {{ $journey->destination == 'botolan' ? 'selected' : '' }}>Botolan</option>
                        <option value="san_narciso" {{ $journey->destination == 'san_narciso' ? 'selected' : '' }}>San Narciso</option>
                        <option value="candelaria" {{ $journey->destination == 'cadeleria' ? 'selected' : '' }}>Candelaria</option>
                        <option value="subic" {{ $journey->destination == 'subic' ? 'selected' : '' }}>Subic</option>
                        <option value="palauig" {{ $journey->destination == 'palauig' ? 'selected' : '' }}>Palauig</option>
                        <option value="masinloc" {{ $journey->destination == 'masinloc' ? 'selected' : '' }}>Masinloc</option>
                        <option value="olongapo" {{ $journey->destination == 'olongapo' ? 'selected' : '' }}>Olongapo</option>
                        <option value="cabangan" {{ $journey->destination == 'cabangan' ? 'selected' : '' }}>Cabangan</option>
                        <option value="san_marcelino" {{ $journey->destination == 'san_marcelino' ? 'selected' : '' }}>San Marcelino</option>
                        <option value="san_antonio" {{ $journey->destination == 'san_antonio' ? 'selected' : '' }}>San Antonio</option>
                        <option value="santa_cruz" {{ $journey->destination == 'santa_cruz' ? 'selected' : '' }}>Santa Cruz</option>
                        <option value="castillejos" {{ $journey->destination == 'castillejos' ? 'selected' : '' }}>Castillejos</option>                    </select>
                </div>
                <div class="input-field">
                    <label>Select Vehicle</label>
                    <select name="vehicle_type" required>
                        <option value="">Choose Vehicle</option>
                        <option value="blu_bus" {{ $journey->vehicle_type == 'blu_bus' ? 'selected' : '' }}>Blue Bus</option>
                        <option value="uv_express" {{ $journey->vehicle_type == 'uv_express' ? 'selected' : '' }}>UV Express (Van)</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ $journey->price }}" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Journey</button>
        </div>
    </div>
</form>
<a href="{{ route('journeys.index') }}" class="back-button">
    <i class="fas fa-arrow-left"></i> Back
  </a>
</div>

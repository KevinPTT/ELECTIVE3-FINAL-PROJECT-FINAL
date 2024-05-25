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
});
</script>
<div class="container">
    <form action="{{ route('journey.post') }}" method="POST">
        @csrf
        <div class="form first">
            <div class="details personal">
                <div class="fields">
                    <div class="input-field">
                        <label>Select Date</label>
                        <input type="date" name="booking_date" placeholder="Enter Date" required>
                    </div>
                    <div class="input-field">
                        <label>Origin</label>
                        <select name="origin" required>
                            <option value="">Choose Origin</option>
                            <option value="aningway_sacatihan">Aningway Sacatihan</option>
                            <option value="asinan_poblacion">Asinan Poblacion</option>
                            <option value="asinan_proper">Asinan Proper</option>
                            <option value="baraca_camachile">Baraca-Camachile (Pob.)</option>
                            <option value="batiawan">Batiawan</option>
                            <option value="calapacuan">Calapacuan</option>
                            <option value="calapandayan">Calapandayan (Pob.)</option>
                            <option value="cawag">Cawag</option>
                            <option value="ilwas">Ilwas (Pob.)</option>
                            <option value="mangan_vaca">Mangan-Vaca</option>
                            <option value="matain">Matain</option>
                            <option value="naugsol">Naugsol</option>
                            <option value="pamatawan">Pamatawan</option>
                            <option value="san_isidro">San Isidro</option>
                            <option value="santo_tomas">Santo Tomas</option>
                            <option value="wawandue">Wawandue (Pob.)</option>
                            <option value="">Choose Location</option>
                            <option value="Asinan">Asinan</option>
                            <option value="banicain">Banicain</option><option value="Barreto">Barreto</option>
                            <option value="East_Bajac-bajac">East Bajac-bajac</option>
                            <option value="East_Tapinac">East Tapinac</option>
                            <option value="Gordon_Heights">Gordon Heights</option>
                            <option value="Kalaklan">Kalaklan</option>
                            <option value="Mabayuan">Mabayuan</option>
                            <option value="New_Cabalan">New Cabalan</option>
                            <option value="New_Ilalim">New Ilalim</option>
                            <option value="New_Kababae">New Kababae</option>
                            <option value="New_Kalalake">New Kalalake</option>
                            <option value="Old_Cabalan">Old Cabalan</option>
                            <option value="Pag-asa">Pag-asa</option>
                            <option value="Santa_Rita">Santa Rita</option>
                            <option value="West_Bajac-bajac">West Bajac-bajac</option>
                            <option value="West_Tapina">West Tapina</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Destination</label>
                        <select name="destination" required>
                            <option value="">Choose Destination</option>
                            <option value="iba">Iba</option>
                            <option value="botolan">Botolan</option>
                            <option value="san_narciso">San Narciso</option>
                            <option value="candelaria">Candelaria</option>
                            <option value="subic">Subic</option>
                            <option value="palauig">Palauig</option>
                            <option value="masinloc">Masinloc</option>
                            <option value="olongapo">Olongapo</option>
                            <option value="cabangan">Cabangan</option>
                            <option value="san_marcelino">San Marcelino</option>
                            <option value="san_antonio">San Antonio</option>
                            <option value="santa_cruz">Santa Cruz</option>
                            <option value="castillejos">Castillejos</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Select Vehicle</label>
                        <select name="vehicle_type" required>
                            <option value="">Choose Vehicle</option>
                            <option value="blu_bus">Blue Bus</option>
                            <option value="uv_express">UV Express (Van)</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Price</label>
                        <input type="text" name="price" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
                <!-- Card for City, Terminal, and Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Terminal Info</h5>
                    </div>
                    <div class="card-body">
                        <!-- Add a fixed height container for the table -->
                        <div style="max-height: 219px; overflow-y: auto;">
                            <!-- Table inside the container -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Terminal</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Terminal 1</td>
                                        <td>Olongapo</td>
                                    </tr>
                                    <tr>
                                        <td>Terminal 2</td>
                                        <td>Castillejos</td>
                                    </tr>
                                    <tr>
                                        <td>Terminal 3</td>
                                        <td>San Marcelino</td>
                                    </tr>
                                    <tr>
                                        <td>Terminal 4</td>
                                        <td>San Felipe</td>
                                    </tr>
                                    <tr>
                                        <td>Terminal 5</td>
                                        <td>Cabangan</td>
                                    </tr>
                                    <tr>
                                        <td>Terminal 6</td>
                                        <td>Iba Zambales</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('js/userscript.js') }}"></script>


    <script>
        $(document).ready(function() {
    // Delete booking
    $('.delete-btn').click(function() {
        var bookingId = $(this).data('id');
        var confirmDelete = confirm('Are you sure you want to delete this booking?');

        if (confirmDelete) {
            $.ajax({
                url: '/bookings/' + bookingId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Booking deleted successfully');
                    location.reload();
                },
                error: function(error) {
                    alert('Error deleting booking');
                }
            });
        }
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>

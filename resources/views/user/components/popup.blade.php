<!-- resources/views/user/components/popup.blade.php -->

<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel" style="z-index:99999">Search Ticket</h5>
                <button type="button" class="close" onclick="hideBookingModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @include('user.components.booking_form') <!-- Include ang booking form dito -->
            </div>
        </div>
    </div>
</div>



@include('portal.components.header')
@include('portal.components.sidebar')

@php
$total_sm_assigned = 4;
$max_sm_allowed = 5;
@endphp


<div class="dash-content">
    <div class="overview">
        <h1>Stall Manning Details</h1>
        <button class="btn btn-primary" id="toggleFormButton">
            <i class="fas fa-plus"></i> Add Stall Manning
        </button>

        @if ($exhibitorsm)
        <div class="org-details">
            <h4>Organization Name: {{ $exhibitorsm->org_name }}</h4>
        </div>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>SM Name</th>
                    <th>SM Email</th>
                    <th>SM Designation</th>
                    <th>SM Phone</th>
                    <th>SM Govt ID Type</th>
                    <th>SM Govt ID Number</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++) <tr>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_name'} }}</td>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_email'} }}</td>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_designation'} }}</td>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_mobile'} }}</td>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_govt_id_type'} }}</td>
                    <td>{{ $exhibitorsm->{'sm' . $i . '_govt_id_number'} }}</td>
                    <td></td>
                    </tr>
                    @endfor
            </tbody>
        </table>
        @else
        <tr>
            <td colspan="6" class="text-center">No exhibitor found</td>
        </tr>
        @endif

        <!-- Stall Manning Form -->
        <div id="stallManningFormContainer" style="display: none; margin-top: 20px;">
            <form action="{{ route('post_StallManning') }}" method="POST" id="stallManningForm">
                @csrf
                <input type="hidden" name="exhibitor_id" value="EXH1234">
                <div class="stallManningEntry">
                    <h5>Stall Manning Person</h5>
                    <div class="form-group">
                        <label for="sm_name">SM Name</label>
                        <input type="text" class="form-control" id="sm_name" name="sm_name" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_email">SM Email</label>
                        <input type="email" class="form-control" id="sm_email" name="sm_email" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_designation">SM Designation</label>
                        <input type="text" class="form-control" id="sm_designation" name="sm_designation" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_mobile">SM Phone</label>
                        <input type="text" class="form-control" id="sm_mobile" name="sm_mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_govt_id_type">SM Govt ID Type</label>
                        <input type="text" class="form-control" id="sm_govt_id_type" name="sm_govt_id_type" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_govt_id_number">SM Govt ID Number</label>
                        <input type="text" class="form-control" id="sm_govt_id_number" name="sm_govt_id_number" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formContainer = document.getElementById('stallManningFormContainer');
        const toggleFormButton = document.getElementById('toggleFormButton');

        // Function to update button disabled state
        function updateButtonState(totalSmAssigned) {
            const maxSmAllowed = totalSmAssigned === 3 ? 3 : 5;
            toggleFormButton.disabled = totalSmAssigned >= maxSmAllowed;
        }
        const totalSmAssigned = <?php echo $total_sm_assigned; ?>; // Fetch PHP variable

        // Initial update
        updateButtonState(totalSmAssigned);

        toggleFormButton.addEventListener('click', function() {
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>

@include('portal.components.header')
@include('portal.components.sidebar')

<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Directory</h1>
        @if (!empty($directories))
        @foreach ($directories as $directory)
        <div class="exhibitor-card">
            <h2>{{ $directory['org_name'] }}</h2>
            <p><strong>Fascia Name:</strong> {{ $directory['fascia_name'] }}</p>
            <div class="org-logo">
                <img src="{{ asset('storage/logos/' . $directory['org_logo']) }}" alt="{{ $directory['org_name'] }} Logo">
            </div>
            <p><strong>Organization Profile:</strong>
                <a href="{{ asset('storage/profiles/' . $directory['org_profile']) }}" target="_blank">Download Profile</a>
            </p>
        </div>
        @endforeach
        @else
        <p>No exhibitors found.</p>
        <form action="{{ route('post_ExhibitorDirectory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="exhibitor_id" value="EXH1234">
            <div class="form-group">
                <label for="org_name">Organization Name</label>
                <input type="text" class="form-control" id="org_name" name="org_name" required>
            </div>
            <div class="form-group">
                <label for="fascia_name">Fascia Name</label>
                <input type="text" class="form-control" id="fascia_name" name="fascia_name" required>
            </div>
            <div class="form-group">
                <label for="org_logo">Organization Logo</label>
                <input type="file" class="form-control" id="org_logo" name="org_logo" required>
            </div>
            <div class="form-group">
                <label for="org_profile">Organization Profile</label>
                <input type="file" class="form-control" id="org_profile" name="org_profile" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endif
    </div>
</div>

<style>
    .exhibitor-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .exhibitor-card h2 {
        margin-top: 0;
    }

    .org-logo img {
        max-width: 200px;
        height: auto;
        margin-top: 10px;
    }

    .org-profile a {
        color: #007bff;
        text-decoration: none;
    }

    .org-profile a:hover {
        text-decoration: underline;
    }

    form {
        border: 1px solid #ddd;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

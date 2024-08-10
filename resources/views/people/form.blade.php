<div class="form-group mb-2">
    <label for="employee_number">Employee Number</label>
    <input type="text" class="form-control" name="employee_number" value="{{ old('employee_number', $people->employee_number ?? '') }}" required>
</div>
<div class="form-group mb-2">
    <label for="employee_name">Employee Name</label>
    <input type="text" class="form-control" name="employee_name" value="{{ old('employee_name', $people->employee_name ?? '') }}" required>
</div>
<div class="form-group mb-2">
    <label for="legal_address">Legal Address</label>
    <input type="text" class="form-control" name="legal_address" value="{{ old('legal_address', $people->legal_address ?? '') }}" required>
</div>
<div class="form-group mb-2">
    <label for="domicile_address">Domicile Address</label>
    <input type="text" class="form-control" name="domicile_address" value="{{ old('domicile_address', $people->domicile_address ?? '') }}" required>
</div>
<div class="form-group mb-2">
    <label for="organization_id">Organization</label>
    <select class="form-control" name="organization_id" required>
        <option value="">----</option>
        @foreach ($organizations as $organization)
            <option value="{{ $organization->id }}" {{ (old('organization_id') == $organization->id || (isset($people) && $people->organization_id == $organization->id)) ? 'selected' : '' }}>{{ $organization->organization_name }}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
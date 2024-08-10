<div class="form-group mb-2">
    <label for="organization_code">Organization Code</label>
    <input type="text" class="form-control" name="organization_code" value="{{ old('organization_code', $organization->organization_code ?? '') }}" required>
</div>
<div class="form-group mb-2">
    <label for="organization_name">Organization Name</label>
    <input type="text" class="form-control" name="organization_name" value="{{ old('organization_name', $organization->organization_name ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
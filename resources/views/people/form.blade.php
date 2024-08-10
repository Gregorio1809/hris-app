<div class="grid gap-6 mb-6 md:grid-cols-2 w-full max-w-xl">
<div>
    <label for="employee_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Number</label>
    <input type="text" name="employee_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  value="{{ old('employee_number', $people->employee_number ?? '') }}" required />
</div>
<div>
    <label for="employee_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Name</label>
    <input type="text" name="employee_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  value="{{ old('employee_name', $people->employee_name ?? '') }}" required />
</div>
<div>
    <label for="legal_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Legal Address</label>
    <input type="text" name="legal_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  value="{{ old('legal_address', $people->legal_address ?? '') }}" required />
</div>
<div>
    <label for="domicile_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domicile Address</label>
    <input type="text" name="domicile_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  value="{{ old('domicile_address', $people->domicile_address ?? '') }}" required />
</div>     
<div>
<label for="organization_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization</label>
<select name="organization_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<option value="">----</option>
        @foreach ($organizations as $organization)
            <option value="{{ $organization->id }}" {{ (old('organization_id') == $organization->id || (isset($people) && $people->organization_id == $organization->id)) ? 'selected' : '' }}>{{ $organization->organization_name }}</option>
        @endforeach
</select>
</div>
<div></div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>



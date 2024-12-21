<x-layout>
    <div class="container mx-auto p-6">
        <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-8">
            @csrf
            @method('PUT')
    
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Profile</h2>
                    <p class="mt-1 text-sm text-gray-600 mb-6">This information will be displayed publicly so be careful what you share.</p>
    
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="avatar" class="block text-sm font-medium text-gray-900 mb-2">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profile Picture" class="h-24 w-24 rounded-full object-cover">
                                @else
                                    <svg class="h-24 w-24 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                                <input type="file" id="avatar" name="avatar" class="hidden" accept="image/*">
                                <button type="button" onclick="document.getElementById('avatar').click()" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Personal Information</h2>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="full_name" class="block text-sm font-medium text-gray-900">Full name</label>
                            <div class="mt-2">
                                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
    
                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium text-gray-900">Location</label>
                            <div class="mt-2">
                                <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
    
                        <div class="sm:col-span-3">
                            <label for="parent-skill" class="block text-sm font-medium text-gray-900">Skill</label>
                            <div class="mt-2">
                                <select id="parent-skill" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="">-- Select Parent Skill --</option>
                                    @foreach ($parentSkills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="sm:col-span-3">
                            <label for="skill_id" class="block text-sm font-medium text-gray-900">Sub-skill</label>
                            <div class="mt-2">
                                <select id="skill_id" name="skill_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" disabled>
                                    <option value="">-- Select Child Skill --</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-span-full">
                            <label for="experience" class="block text-sm font-medium text-gray-900">Experience</label>
                            <div class="mt-2">
                                <input type="text" name="experience" id="experience" value="{{ old('experience', $user->experience) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
    
                        @if(auth()->user()->role_id === 1)
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="company_name" class="block text-sm font-medium text-gray-900">Company name</label>
                            <div class="mt-2">
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $user->company_name) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
    
                        <div class="sm:col-span-2">
                            <label for="company_location" class="block text-sm font-medium text-gray-900">Company location</label>
                            <div class="mt-2">
                                <input type="text" name="company_location" id="company_location" value="{{ old('company_location', $user->company_location) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
    
                        <div class="sm:col-span-2">
                            <label for="job_title" class="block text-sm font-medium text-gray-900">Job title</label>
                            <div class="mt-2">
                                <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $user->job_title) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    
        <form action="{{ route('userprofile.destroy') }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" onclick="return confirm('Are you sure you want to delete your profile?')">Delete Profile</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#parent-skill').on('change', function() {
                var parentId = $(this).val();
                if (parentId) {
                    $('#skill_id').html('<option value="">Loading...</option>').prop('disabled', true);
                    $.ajax({
                        url: '/skills/' + parentId + '/children',
                        type: 'GET',
                        success: function(data) {
                            $('#skill_id').empty().append('<option value="">-- Select Child Skill --</option>');
                            $.each(data, function(key, value) {
                                $('#skill_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#skill_id').prop('disabled', false);
                        },
                        error: function() {
                            alert('Failed to load child skills. Please try again.');
                        }
                    });
                } else {
                    $('#skill_id').empty().append('<option value="">-- Select Child Skill --</option>').prop('disabled', true);
                }
            });
        });
    </script>
</x-layout>
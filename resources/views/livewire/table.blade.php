<div class="w-full overflow-x-auto">
    <table class="min-w-full divide-y divide-blue-200">
        <thead class="bg-blue-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Role</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Last Connection</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-green-50 divide-y divide-green-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-green-600">{{ $user['name'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-green-600">{{ $user['email'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-green-600">{{ $user['role'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-green-600">{{ $user['lastt_connection'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button
                            wire:click="$dispatch('openModal', {component: 'update-user', arguments: {'user': {{$user->id}}}})">
                            Edit
                        </button>
                        <button
                            wire:click="$dispatch('openModal', {component: 'delete-user', arguments: {'user': {{$user->id}}}})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

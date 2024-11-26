<div>
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-semibold mb-4">Criar Novo Token</h2>
        <form wire:submit.prevent="create" id="createTokenForm" class="space-y-4">
            <div>
                <label for="tokenName" class="block text-sm font-medium text-gray-700">Nome do Token</label>
                <x-input wire:model="device_name" type="text" id="tokenName" name="tokenName" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div>
                <label for="tokenExpiry" class="block text-sm font-medium text-gray-700">Expiração (dias)</label>
                <x-input wire:model="days" type="number" id="tokenExpiry" name="tokenExpiry" min="1" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Criar Token
            </button>
        </form>
    </div>

    <!-- Tabela de tokens -->
    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Token
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Usado pela última vez</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Expiração</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Exemplo de linha de token -->
                @foreach ($tokens as $token)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-500">{{ $token->token }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->last_used_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-500">{{ $token->expires_at }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button wire:click="revoke({{ $token->id }})"
                                class="text-red-600 hover:text-red-900 focus:outline-none focus:underline">
                                Revogar
                            </button>
                        </td>
                    </tr>
                @endforeach
                <!-- Adicione mais linhas conforme necessário -->
            </tbody>
        </table>
    </div>
</div>

LLM support in VisualEditor

Example configs

```php
$wgAIEditingAssistantActiveProvider = 'open-ai';
$wgAIEditingAssistantActiveProviderConnection = [ 
    'secret' => 'your_secret',
];
```

```php
$wgAIEditingAssistantActiveProvider = 'ollama';
$wgAIEditingAssistantActiveProviderConnection = [ 
    'url' => 'your_api_url',
];
```

```php
$wgAIEditingAssistantActiveProvider = 'azure';
$wgAIEditingAssistantActiveProviderConnection = [ 
    'url' => 'https://your-resource-name.openai.azure.com/openai/deployments/gpt-4o-2024-08-06/chat/completions?api-version=2024-08-01-preview',
    'secret' => 'your_api_key',
    'model' => 'gpt-4o',
];
```
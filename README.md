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

<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['.devcontainer', '.github', '.vscode'])
    ->notPath('src/laravel/storage')
    ->notPath('src/laravel/bootstrap/cache')
    ->notPath('src/laravel/vendor')
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();

return $config
        ->setRiskyAllowed(true)
        ->setRules([
        '@PSR12' => true,

        // Modernização e Limpeza
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true, // Requer setRiskyAllowed(true)

        // Formatação Visual
        'concat_space' => ['spacing' => 'one'],
        'trailing_comma_in_multiline' => true,
        'unary_operator_spaces' => true,
        'binary_operator_spaces' => true,

        // PHPDoc e Tipos
        'phpdoc_scalar' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_var_without_name' => true,

        // Estrutura de Classes e Métodos
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
            ],
        ],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => true,
        ],
        'single_trait_insert_per_statement' => true,
    ])
    ->setFinder($finder);
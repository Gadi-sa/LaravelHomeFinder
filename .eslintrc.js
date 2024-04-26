module.exports = {
    parser: 'vue-eslint-parser',
    extends: ['eslint:recommended', 'plugin:vue/vue3-recommended'],
    parserOptions: {
        parser: 'babel-eslint',
        ecmaVersion: 2020,
        sourceType: 'module',
    },
    env: {
        amd: true,
        browser: true,
        es6: true,
    },
    plugins: [
        'vue',
        'babel'
    ],
    rules: {
        indent: ['error', 2],
        quotes: ['warn', 'single'],
        semi: ['warn', 'never'],
        'no-unused-vars': ['error', { vars: 'all', args: 'after-used', ignoreRestSiblings: true }],
        'comma-dangle': ['warn', 'always-multiline'],
        'vue/multi-word-component-names': 'off',
        'vue/max-attributes-per-line': 'off',
        'vue/no-v-html': 'off',
        'vue/require-default-prop': 'off',
        'vue/no-multiple-template-root': 'off',
        'vue/singleline-html-element-content-newline': 'off',
        'vue/html-self-closing': [
            'warn',
            {
                html: {
                    void: 'always',
                    normal: 'always',
                    component: 'always',
                },
            },
        ],
        'vue/no-v-text-v-html-on-component': 'off',
    },
}

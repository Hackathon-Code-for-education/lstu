/* eslint-env node */
require('@rushstack/eslint-patch/modern-module-resolution')

module.exports = {
  root: true,
  env: {
    node: true
  },
  extends: ['plugin:vue/essential', 'eslint:recommended', '@vue/prettier'],
  parserOptions: {
    parser: '@babel/eslint-parser',
    requireConfigFile: false
  },
  rules: {
    // Настройки правил ESLint...
  },
  overrides: [
    {
      files: ['*.css'],
      rules: {
        'css/**': 'off'
      }
    }
  ]
}

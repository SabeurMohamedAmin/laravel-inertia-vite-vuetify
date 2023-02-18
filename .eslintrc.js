//.eslintrc.js
module.exports = {
  env: {
    node: true,
  },
  extends: [
    'eslint:recommended',
    'plugin:vue/vue3-recommended',
    "prettier",
  ],
  rules: {
    // override/add rules settings here, such as:
    indent:['error', 2],
    semi:['warn', 'always'],
    'comma-dangle':['warn', 'always-multiline'],
    
    //VUE RULES
    "vue/v-on-event-hyphenation": ["error", "always", {
      "autofix": true,
      "ignore": [],
    }],
    'vue/no-unused-vars': 'error',
    'vue/singleline-html-element-content-newline':'off',
    'vue/multi-word-component-names': 'off',
    'vue/require-default-prop': 'off',
    'vue/max-attributes-per-line': 'off',
    'vue/no-v-html':'off',
  },
  'globals':{
    'route':'writable', //this is power by Ziggy to expose routes
    'Ziggy':'writable', //?? i dont know why it is not defined
  },
};

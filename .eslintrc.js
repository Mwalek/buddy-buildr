module.exports = {
  'env': {
    'browser': true,
    'commonjs': true,
    'es2021': true,
  },
  'extends': [
    'google',
  ],
  'parserOptions': {
    'ecmaVersion': 'latest',
  },
  'rules': {
    "linebreak-style": 0,
    "require-jsdoc" : 0,
    "comma-dangle": ["error", "never"],
    "quotes": ["error", "double"]
  },
};

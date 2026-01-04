#!/usr/bin/env node

const postcss = require('postcss');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const fs = require('fs');
const path = require('path');

const inputPath = path.join(__dirname, 'assets/css/tailwind.css');
const outputPath = path.join(__dirname, 'assets/css/output.css');

const css = fs.readFileSync(inputPath, 'utf8');

postcss([tailwindcss, autoprefixer])
  .process(css, { from: inputPath, to: outputPath })
  .then(result => {
    fs.writeFileSync(outputPath, result.css);
    console.log('✓ Tailwind CSS built successfully');
    console.log(`  Output: ${outputPath}`);
  })
  .catch(err => {
    console.error('✗ Build failed:', err.message);
    process.exit(1);
  });

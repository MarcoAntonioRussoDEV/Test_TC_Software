import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                danger:'#960000',
                'base-secondary': '#374151',
                "border-input": "#424B56"
                
            }
        },
    },
    daisyui: {
        themes: [
          {
            d: {
              
                "primary": "#ede9fe",
                        
                "secondary": "#9ca3af",
                        
                "accent": "#f3f4f6",
                        
                "neutral": "#9ca3af",
                        
                "base-100": "#1f2937",

                "base-secondary": "#374151",
                        
                "info": "#044759",
                        
                "success": "#22c55e",
                        
                "warning": "#fde047",
                        
                "error": "#991b1b",

              },
            },
          ],
        },
    plugins: [
        require("daisyui")
    ],
};

import prettier from 'eslint-config-prettier';
import vue from 'eslint-plugin-vue';
import { defineConfigWithVueTs, vueTsConfigs } from '@vue/eslint-config-typescript';

export default defineConfigWithVueTs(
    vue.configs['flat/essential'],
    vueTsConfigs.recommended,
    {
        ignores: ['vendor', 'node_modules', 'public', 'bootstrap/ssr', 'tailwind.config.js'],
    },
    {
        rules: {
            // Правила Vue
            'vue/multi-word-component-names': 'off',

            // Запрещаем использование any
            '@typescript-eslint/no-explicit-any': 'error', // Требуем явные типы вместо any

            // Требуем явные типы для всех переменных, параметров и возвращаемых значений
            '@typescript-eslint/typedef': [
                'error',
                {
                    variableDeclaration: true,        // Типы для всех переменных (const, let, var)
                    parameter: true,                  // Типы для параметров функций
                    arrowParameter: true,             // Типы для параметров стрелочных функций
                    memberVariableDeclaration: true,  // Типы для свойств классов/объектов
                    propertyDeclaration: true,        // Типы для свойств в объектах
                },
            ],

            // Требуем явные типы возвращаемых значений для функций
            '@typescript-eslint/explicit-function-return-type': [
                'error',
                {
                    allowExpressions: false,          // Запрещаем неявные типы в выражениях
                    allowTypedFunctionExpressions: true, // Разрешаем вывод типов только для типизированных функций
                    allowHigherOrderFunctions: false, // Требуем типы даже для функций высшего порядка
                },
            ],

            // Предупреждение о неиспользуемых переменных
            '@typescript-eslint/no-unused-vars': 'warn',

            // Запрещаем неявные типы для членов объектов (дополнительная строгость)
            '@typescript-eslint/explicit-member-accessibility': [
                'error',
                { accessibility: 'explicit' }, // Требуем public/private/protected для свойств классов
            ],
            // Добавляем правило для проверки возврата void
            '@typescript-eslint/no-unsafe-return': 'error',
        },
    },
    prettier,
);
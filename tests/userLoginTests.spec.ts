import { test, expect } from '@playwright/test';

test.describe('User Login Process', () => {
    test('Navigate to login page', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await expect(page).toHaveURL('http://127.0.0.1:8000/login');
    });

    test('Validate empty email field', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await page.getByLabel('Password', { exact: true }).fill('password');
        await page.getByRole('button', { name: 'Login' }).click();
        await expect(page.getByText('The email field is required.')).toBeVisible();
    });

    test('Validate empty password field', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await page.getByRole('button', { name: 'Login' }).click();
        await expect(page.getByText('The password field is required.')).toBeVisible();
    });


    test('Validate incorrect email', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await page.getByLabel('Email').click();
        await page.getByLabel('Email').fill('incorrect_email@hf.nl');

        await page.getByLabel('Password').click();
        await page.getByLabel('Password').fill('IncorrectPassword$!');
        await page.getByRole('button', { name: 'Login' }).click();
        await page.locator('div').filter({ hasText: /^PasswordLogin failed\. Please check your credentials\.$/ }).locator('div').click();


        await page.getByLabel('Password').fill('IncorrectPassword$!');
        await page.getByRole('button', { name: 'Login' }).click();

        await page.locator('div').filter({ hasText: /^EmailLogin failed\. Please check your credentials\.$/ }).locator('div').click();
    });


    test('Successful login', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await page.getByLabel('Email').click();
        await page.getByLabel('Email').fill('correct_email@hf.nl');
        await page.getByLabel('Password').click();
        await page.getByLabel('Password').fill('P@ssw0rd_1KL');
        await page.getByRole('button', { name: 'Login' }).click();

        // Wait for navigation to the listing page
        await page.waitForNavigation({ url: 'http://127.0.0.1:8000/listing' });
        await page.getByRole('button', { name: 'Tester Login' }).click();
    });

});

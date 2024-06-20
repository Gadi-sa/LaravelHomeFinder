import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/login');
    await page.getByRole('link', { name: 'Don\'t have an account?' }).click();

    await page.getByLabel('Your Name').click();
    await page.getByLabel('Your Name').fill('');
    await page.getByLabel('Your Name').press('Enter');
    await expect(page.getByText('The name field is required.')).toBeVisible();

    await page.getByLabel('Email').fill('test@example.com');
    await expect(page.getByText('The email field is required.')).toBeVisible();


    await page.getByRole('button', { name: 'Create Account' }).click();
});

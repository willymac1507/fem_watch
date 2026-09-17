<script setup lang="ts">
import {Form, Head} from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import {Button} from '@/components/ui/button';
import {Checkbox} from '@/components/ui/checkbox';
import {Input} from '@/components/ui/input';
import {Label} from '@/components/ui/label';
import {Spinner} from '@/components/ui/spinner';
import {register} from '@/routes';
import {store} from '@/routes/login';
import {request} from '@/routes/password';

defineOptions({
    layout: {
        title: 'Login',
        description: '',
    },
});

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();
</script>

<template>
    <Head title="Login"/>


    <div
        v-if="status"
        class="mb-4 text-center text-sm font-medium text-green-600"
    >
        {{ status }}
    </div>

    <Form
        v-bind="store.form()"
        :reset-on-success="['password']"
        v-slot="{ errors, processing }"
        class="flex flex-col gap-6"
    >
        <div class="grid gap-6">
            <div class="grid gap-2 relative">
                <Input
                    id="email"
                    type="email"
                    name="email"
                    autofocus
                    :tabindex="1"
                    required
                    autocomplete="email"
                    placeholder="Email address"
                />
                <InputError :message="errors.email" class="py-2 inset-0 absolute w-full text-right px-10"/>
            </div>
            <div class="grid-gap-2 relative">
                <PasswordInput
                    id="password"
                    name="password"
                    required
                    :tabindex="2"
                    autocomplete="current-password"
                    placeholder="Password"
                />
                <InputError :message="errors.password" class="py-2 inset-0 absolute w-full text-right px-10"/>
            </div>


            <div class="flex items-center justify-end w-full">
                <TextLink
                    v-if="canResetPassword"
                    :href="request()"
                    class="text-sm"
                    :tabindex="5"
                >
                    Forgot your password?
                </TextLink>
            </div>


            <div v-show="false" class="flex items-center justify-between">
                <Label for="remember" class="flex items-center space-x-3">
                    <Checkbox id="remember" name="remember" :tabindex="3"/>
                    <span>Remember me</span>
                </Label>
            </div>

            <Button
                type="submit"
                class="py-6 mt-4 w-full font-normal bg-app-primary hover:bg-app-icon-active text-white hover:bg-app-primary/90 text-body-m"
                :tabindex="4"
                :disabled="processing"
                data-test="login-button"
            >
                <Spinner v-if="processing"/>
                Login to your account
            </Button>
        </div>

        <div class="text-app-icon-active text-center text-sm">
            Don't have an account?
            <TextLink class="text-app-primary" :href="register()" :tabindex="5">Sign up</TextLink>
        </div>
    </Form>
</template>

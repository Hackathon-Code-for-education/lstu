<script setup>
import siteLogo from './siteLogo.vue';
import { Avatar, AvatarImage, AvatarFallback }  from '@/components/ui/avatar';
</script>

<template>
    <div class="flex justify-between items-center">
        <siteLogo></siteLogo>
        <div class="flex items-center gap-4">
            <Avatar>
                <AvatarImage src="https://api.dicebear.com/8.x/lorelei-neutral/svg" alt="@radix-vue" />
                <AvatarFallback>CN</AvatarFallback>
            </Avatar>
            <p>Иванов И. И.</p>
        </div>
    </div>
</template>
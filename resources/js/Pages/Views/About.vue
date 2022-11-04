<script setup>
import { onMounted } from '@vue/runtime-core';
import useNotes from '../../Composables/useNotes';

const { notes, error, isLoading, fetchNotesFromDb } = useNotes();

onMounted(async () => {
    await fetchNotesFromDb();
});

</script>

<template>
    <div class="container">
        <div class="">
            About

            {{ notes }}
        </div>
    </div>
</template>


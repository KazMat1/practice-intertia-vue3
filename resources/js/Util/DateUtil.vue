<script>
import { inject } from 'vue';

export const formattedDate = ((date, format) => {
    const dayjs = inject('dayjs');
    return dayjs(date).format(format)
});
</script>

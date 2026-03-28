<?php
/**
 * Template part for displaying project pricing
 */

$pricing_list = get_field('project_pricing_list');

if ( ! $pricing_list || ! is_array($pricing_list) ) {
    return;
}

$status_labels = array(
    'available' => '<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold uppercase tracking-wider">Đang mở bán</span>',
    'sold'      => '<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold uppercase tracking-wider">Đã bán</span>',
    'coming'    => '<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider">Sắp ra mắt</span>',
);
?>

<section class="project-pricing py-20 bg-white" id="project-pricing">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Bảng Giá Căn Hộ</h2>
            <p class="text-zinc-500 max-w-2xl mx-auto">Thông tin giá bán chi tiết từng loại hình sản phẩm.</p>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-zinc-200 shadow-sm">
            <table class="w-full text-left border-collapse min-w-[600px]">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200">
                        <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Loại căn hộ</th>
                        <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Diện tích</th>
                        <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Giá bán dự kiến</th>
                        <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Tình trạng</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    <?php foreach ($pricing_list as $price_item): 
                        $type = isset($price_item['type']) ? $price_item['type'] : '';
                        $area = isset($price_item['area']) ? $price_item['area'] : '';
                        $price = isset($price_item['price']) ? $price_item['price'] : '';
                        $status_key = isset($price_item['status']) ? $price_item['status'] : 'available';
                        $status_html = isset($status_labels[$status_key]) ? $status_labels[$status_key] : '';
                    ?>
                        <tr class="hover:bg-zinc-50/50 transition-colors duration-200">
                            <td class="py-4 px-6 font-medium text-zinc-900"><?php echo esc_html($type); ?></td>
                            <td class="py-4 px-6 text-zinc-600"><?php echo esc_html($area); ?></td>
                            <td class="py-4 px-6 font-semibold text-champagne-gold"><?php echo esc_html($price); ?></td>
                            <td class="py-4 px-6"><?php echo $status_html; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

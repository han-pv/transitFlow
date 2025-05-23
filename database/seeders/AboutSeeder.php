<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'name' => 'TransitFlow',
            'text' => 'Welcome to Horizon Innovations, where creativity meets expertise to shape a brighter future. Founded with a bold vision to redefine how businesses and individuals connect with innovative solutions, we are a dynamic team committed to transforming ideas into impactful realities. Our journey began with a simple belief: that innovation, when paired with integrity and collaboration, can solve the most complex challenges and create lasting value. At Horizon Innovations, we specialize in delivering tailored services that blend cutting-edge technology with strategic insight. Whether it’s developing intuitive software, providing data-driven consulting, or crafting compelling brand experiences, our multidisciplinary team brings a wealth of expertise to every project. We pride ourselves on our ability to listen, adapt, and deliver solutions that not only meet but exceed our clients’ expectations. Our clients range from startups with big dreams to established enterprises seeking transformation, and we approach each partnership with the same dedication and enthusiasm. Our core values—innovation, integrity, and impact—guide everything we do. We believe in fostering a culture of transparency, where open communication and trust form the foundation of our relationships with clients, partners, and each other. Sustainability is at the heart of our operations, as we strive to create solutions that are not only effective today but also pave the way for a more sustainable tomorrow. Our commitment to continuous learning ensures we stay ahead of industry trends, bringing the latest advancements to our clients. Our team is our greatest asset. Comprising passionate professionals from diverse backgrounds—engineers, designers, strategists, and more—we thrive on collaboration and creativity. Each team member brings a unique perspective, allowing us to tackle challenges from every angle and deliver results that are both innovative and practical. We invest in our people, fostering an environment where ideas are celebrated, and growth is encouraged. Looking ahead, our vision is to lead the way in creating a connected, innovative, and sustainable world. We’re not just building solutions; we’re building a legacy of positive change. Whether it’s empowering a small business to scale new heights or helping a global organization navigate digital transformation, we’re here to make a difference, one project at a time. Thank you for considering Horizon Innovations as your partner. We’re excited to learn about your goals, share our expertise, and work together to turn your vision into reality. Let’s create something extraordinary together.',
            'email' => 'info@mail.com',
            'phone_number' => '+99371404040',
            'second_phone_number' => '+99371505050',
            'address' => 'Yunus emre street, Parahat 7, Ashgabat, Turkmenistan',
            'locations' => '5',
            'delivered_packages' => '100000',
            'satisfied_clients' => '5000',
            'owned_vehicles' => '50',
        ]);
    }
}

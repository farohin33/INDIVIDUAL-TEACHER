<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run(): void
    {

        $topics = [

            ['subject_id'=>1,'name'=>'natural_numbers','title'=>'Natural Numbers'],
            ['subject_id'=>1,'name'=>'fractions','title'=>'Fractions'],
            ['subject_id'=>1,'name'=>'percentages','title'=>'Percentages'],
            ['subject_id' => 1, 'name' => 'natural_numbers', 'title' => 'Natural Numbers'],
    ['subject_id' => 1, 'name' => 'integers', 'title' => 'Integers and Negative Numbers'],
    ['subject_id' => 1, 'name' => 'fractions', 'title' => 'Fractions and Mixed Numbers'],
    ['subject_id' => 1, 'name' => 'decimals', 'title' => 'Decimals and Operations'],
    ['subject_id' => 1, 'name' => 'percentages', 'title' => 'Percentages'],
    ['subject_id' => 1, 'name' => 'ratios', 'title' => 'Ratios and Proportions'],
    ['subject_id' => 1, 'name' => 'prime_numbers', 'title' => 'Prime and Composite Numbers'],
    ['subject_id' => 1, 'name' => 'lcm_gcd', 'title' => 'LCM and GCD'],
    ['subject_id' => 1, 'name' => 'powers', 'title' => 'Powers and Exponents'],
    ['subject_id' => 1, 'name' => 'roots', 'title' => 'Square and Cube Roots'],
    ['subject_id' => 1, 'name' => 'order_operations', 'title' => 'Order of Operations (BODMAS)'],
    ['subject_id' => 1, 'name' => 'scientific_notation', 'title' => 'Scientific Notation'],
    ['subject_id' => 1, 'name' => 'binary_system', 'title' => 'Binary and Hexadecimal'],
    ['subject_id' => 1, 'name' => 'modular_arithmetic', 'title' => 'Modular Arithmetic'],
    ['subject_id' => 1, 'name' => 'rounding', 'title' => 'Estimation and Rounding'],

    // Алгебра
    ['subject_id' => 1, 'name' => 'algebraic_expressions', 'title' => 'Algebraic Expressions'],
    ['subject_id' => 1, 'name' => 'linear_equations', 'title' => 'Linear Equations'],
    ['subject_id' => 1, 'name' => 'linear_inequalities', 'title' => 'Linear Inequalities'],
    ['subject_id' => 1, 'name' => 'systems_equations', 'title' => 'Systems of Equations'],
    ['subject_id' => 1, 'name' => 'factoring_polynomials', 'title' => 'Factoring Polynomials'],
    ['subject_id' => 1, 'name' => 'quadratic_equations', 'title' => 'Quadratic Equations'],
    ['subject_id' => 1, 'name' => 'vietas_formulas', 'title' => 'Vieta\'s Formulas'],
    ['subject_id' => 1, 'name' => 'arithmetic_progressions', 'title' => 'Arithmetic Progressions'],
    ['subject_id' => 1, 'name' => 'geometric_progressions', 'title' => 'Geometric Progressions'],
    ['subject_id' => 1, 'name' => 'functions_basics', 'title' => 'Functions and Graphs'],
    ['subject_id' => 1, 'name' => 'logarithms', 'title' => 'Logarithms Basics'],
    ['subject_id' => 1, 'name' => 'exponential_growth', 'title' => 'Exponential Growth'],
    ['subject_id' => 1, 'name' => 'complex_numbers', 'title' => 'Introduction to Complex Numbers'],
    ['subject_id' => 1, 'name' => 'binomial_theorem', 'title' => 'The Binomial Theorem'],
    ['subject_id' => 1, 'name' => 'absolute_value', 'title' => 'Absolute Value Equations'],

    // Геометрия
    ['subject_id' => 1, 'name' => 'points_lines', 'title' => 'Points, Lines, and Planes'],
    ['subject_id' => 1, 'name' => 'angles', 'title' => 'Angles and Measurement'],
    ['subject_id' => 1, 'name' => 'triangles_props', 'title' => 'Properties of Triangles'],
    ['subject_id' => 1, 'name' => 'pythagorean_theorem', 'title' => 'Pythagorean Theorem'],
    ['subject_id' => 1, 'name' => 'quadrilaterals', 'title' => 'Quadrilaterals'],
    ['subject_id' => 1, 'name' => 'circles_theorems', 'title' => 'Circle Theorems'],
    ['subject_id' => 1, 'name' => 'area_2d', 'title' => 'Area of 2D Shapes'],
    ['subject_id' => 1, 'name' => 'perimeter', 'title' => 'Perimeter and Circumference'],
    ['subject_id' => 1, 'name' => 'solid_geometry', 'title' => 'Prisms and Pyramids'],
    ['subject_id' => 1, 'name' => 'volume_spheres', 'title' => 'Volume and Surface Area'],
    ['subject_id' => 1, 'name' => 'coordinate_geometry', 'title' => 'Coordinate Geometry'],
    ['subject_id' => 1, 'name' => 'vectors', 'title' => 'Vectors in 2D'],
    ['subject_id' => 1, 'name' => 'geometric_transformations', 'title' => 'Transformations'],
    ['subject_id' => 1, 'name' => 'similarity', 'title' => 'Similarity and Congruence'],
    ['subject_id' => 1, 'name' => 'polygons', 'title' => 'Polygons and Interior Angles'],

    // Тригонометрия и Анализ
    ['subject_id' => 1, 'name' => 'trig_ratios', 'title' => 'Trigonometric Ratios'],
    ['subject_id' => 1, 'name' => 'unit_circle', 'title' => 'The Unit Circle'],
    ['subject_id' => 1, 'name' => 'trig_identities', 'title' => 'Trigonometric Identities'],
    ['subject_id' => 1, 'name' => 'limits', 'title' => 'Limits and Continuity'],
    ['subject_id' => 1, 'name' => 'derivatives_intro', 'title' => 'Introduction to Derivatives'],
    ['subject_id' => 1, 'name' => 'differentiation_rules', 'title' => 'Rules of Differentiation'],
    ['subject_id' => 1, 'name' => 'integrals_basic', 'title' => 'Basic Integration'],
    ['subject_id' => 1, 'name' => 'definite_integrals', 'title' => 'Definite Integrals'],
    ['subject_id' => 1, 'name' => 'differential_equations', 'title' => 'Differential Equations'],
    ['subject_id' => 1, 'name' => 'chain_rule', 'title' => 'The Chain Rule'],

    // Статистика, Логика и Матрицы
    ['subject_id' => 1, 'name' => 'statistics_basics', 'title' => 'Mean, Median, and Mode'],
    ['subject_id' => 1, 'name' => 'probability_basics', 'title' => 'Probability Basics'],
    ['subject_id' => 1, 'name' => 'combinations', 'title' => 'Permutations and Combinations'],
    ['subject_id' => 1, 'name' => 'normal_distribution', 'title' => 'Normal Distribution'],
    ['subject_id' => 1, 'name' => 'logic_gates', 'title' => 'Logic Gates and Truth Tables'],
    ['subject_id' => 1, 'name' => 'set_theory', 'title' => 'Set Theory'],
    ['subject_id' => 1, 'name' => 'matrix_ops', 'title' => 'Matrix Operations'],
    ['subject_id' => 1, 'name' => 'matrix_multiplication', 'title' => 'Matrix Multiplication'],
    ['subject_id' => 1, 'name' => 'complex_analysis', 'title' => 'Complex Analysis'],
    ['subject_id' => 1, 'name' => 'graph_theory', 'title' => 'Introduction to Graph Theory'],
    ['subject_id' => 1, 'name' => 'topology_basics', 'title' => 'Topology Basics'],
    ['subject_id' => 1, 'name' => 'number_theory_adv', 'title' => 'Advanced Number Theory'],
    ['subject_id' => 1, 'name' => 'vector_calculus', 'title' => 'Vector Calculus'],
    ['subject_id' => 1, 'name' => 'optimization', 'title' => 'Optimization Problems'],
    ['subject_id' => 1, 'name' => 'mathematical_induction', 'title' => 'Mathematical Induction'],


            ['subject_id'=>4,'name'=>'motion','title'=>'Motion'],
            ['subject_id'=>4,'name'=>'force','title'=>'Force'],
            ['subject_id'=>4,'name'=>'energy','title'=>'Energy'],

    ['subject_id' => 4, 'name' => 'motion_basics', 'title' => 'Introduction to Motion'],
    ['subject_id' => 4, 'name' => 'speed_velocity', 'title' => 'Speed and Velocity'],
    ['subject_id' => 4, 'name' => 'acceleration', 'title' => 'Uniform Acceleration'],
    ['subject_id' => 4, 'name' => 'newtons_first_law', 'title' => 'Newton\'s First Law: Inertia'],
    ['subject_id' => 4, 'name' => 'newtons_second_law', 'title' => 'Newton\'s Second Law: F=ma'],
    ['subject_id' => 4, 'name' => 'newtons_third_law', 'title' => 'Newton\'s Third Law: Action-Reaction'],
    ['subject_id' => 4, 'name' => 'friction_forces', 'title' => 'Types of Friction'],
    ['subject_id' => 4, 'name' => 'gravity_orbits', 'title' => 'Universal Gravitation'],
    ['subject_id' => 4, 'name' => 'circular_motion', 'title' => 'Centripetal Force'],
    ['subject_id' => 4, 'name' => 'work_energy', 'title' => 'Work and Energy'],
    ['subject_id' => 4, 'name' => 'kinetic_energy', 'title' => 'Kinetic Energy'],
    ['subject_id' => 4, 'name' => 'potential_energy', 'title' => 'Gravitational Potential Energy'],
    ['subject_id' => 4, 'name' => 'power_efficiency', 'title' => 'Power and Efficiency'],
    ['subject_id' => 4, 'name' => 'momentum_impulse', 'title' => 'Momentum and Impulse'],
    ['subject_id' => 4, 'name' => 'conservation_momentum', 'title' => 'Conservation of Momentum'],
    ['subject_id' => 4, 'name' => 'torque_rotation', 'title' => 'Torque and Rotational Equilibrium'],
    ['subject_id' => 4, 'name' => 'simple_machines', 'title' => 'Levers and Pulleys'],

    // Термодинамика (Thermodynamics)
    ['subject_id' => 4, 'name' => 'temperature_scales', 'title' => 'Temperature and Heat'],
    ['subject_id' => 4, 'name' => 'thermal_expansion', 'title' => 'Thermal Expansion'],
    ['subject_id' => 4, 'name' => 'specific_heat', 'title' => 'Specific Heat Capacity'],
    ['subject_id' => 4, 'name' => 'heat_transfer', 'title' => 'Conduction, Convection, Radiation'],
    ['subject_id' => 4, 'name' => 'first_law_thermo', 'title' => 'First Law of Thermodynamics'],
    ['subject_id' => 4, 'name' => 'second_law_thermo', 'title' => 'Entropy and Second Law'],
    ['subject_id' => 4, 'name' => 'ideal_gas_law', 'title' => 'Ideal Gas Laws'],
    ['subject_id' => 4, 'name' => 'kinetic_theory', 'title' => 'Kinetic Theory of Gases'],

    // Электричество и Магнетизм (Electricity & Magnetism)
    ['subject_id' => 4, 'name' => 'electrostatics', 'title' => 'Static Electricity'],
    ['subject_id' => 4, 'name' => 'coulombs_law', 'title' => 'Coulomb\'s Law'],
    ['subject_id' => 4, 'name' => 'electric_fields', 'title' => 'Electric Fields'],
    ['subject_id' => 4, 'name' => 'electric_current', 'title' => 'Current and Charge'],
    ['subject_id' => 4, 'name' => 'ohms_law', 'title' => 'Ohm\'s Law'],
    ['subject_id' => 4, 'name' => 'circuits_series', 'title' => 'Series Circuits'],
    ['subject_id' => 4, 'name' => 'circuits_parallel', 'title' => 'Parallel Circuits'],
    ['subject_id' => 4, 'name' => 'electrical_power', 'title' => 'Electrical Energy and Power'],
    ['subject_id' => 4, 'name' => 'magnetism_basics', 'title' => 'Magnetic Poles and Fields'],
    ['subject_id' => 4, 'name' => 'electromagnets', 'title' => 'Electromagnetism'],
    ['subject_id' => 4, 'name' => 'magnetic_induction', 'title' => 'Electromagnetic Induction'],
    ['subject_id' => 4, 'name' => 'ac_dc_current', 'title' => 'Alternating vs Direct Current'],
    ['subject_id' => 4, 'name' => 'transformers', 'title' => 'Transformers and Grid'],

    // Волны и Оптика (Waves & Optics)
    ['subject_id' => 4, 'name' => 'wave_properties', 'title' => 'Properties of Waves'],
    ['subject_id' => 4, 'name' => 'sound_waves', 'title' => 'Sound Intensity and Pitch'],
    ['subject_id' => 4, 'name' => 'doppler_effect', 'title' => 'The Doppler Effect'],
    ['subject_id' => 4, 'name' => 'light_reflection', 'title' => 'Reflection and Mirrors'],
    ['subject_id' => 4, 'name' => 'light_refraction', 'title' => 'Refraction and Lenses'],
    ['subject_id' => 4, 'name' => 'total_internal_reflection', 'title' => 'Critical Angle and Fiber Optics'],
    ['subject_id' => 4, 'name' => 'electromagnetic_spectrum', 'title' => 'The EM Spectrum'],
    ['subject_id' => 4, 'name' => 'diffraction_interference', 'title' => 'Diffraction and Interference'],
    ['subject_id' => 4, 'name' => 'color_theory', 'title' => 'Light and Color'],

    // Атомная и Ядерная Физика (Atomic & Nuclear)
    ['subject_id' => 4, 'name' => 'atomic_structure', 'title' => 'Atomic Models'],
    ['subject_id' => 4, 'name' => 'photoelectric_effect', 'title' => 'Photoelectric Effect'],
    ['subject_id' => 4, 'name' => 'wave_particle_duality', 'title' => 'Wave-Particle Duality'],
    ['subject_id' => 4, 'name' => 'radioactivity_alpha', 'title' => 'Alpha Radiation'],
    ['subject_id' => 4, 'name' => 'radioactivity_beta', 'title' => 'Beta Radiation'],
    ['subject_id' => 4, 'name' => 'radioactivity_gamma', 'title' => 'Gamma Radiation'],
    ['subject_id' => 4, 'name' => 'half_life', 'title' => 'Radioactive Half-Life'],
    ['subject_id' => 4, 'name' => 'nuclear_fission', 'title' => 'Nuclear Fission'],
    ['subject_id' => 4, 'name' => 'nuclear_fusion', 'title' => 'Nuclear Fusion'],

    // Астрофизика и Современная Физика (Astrophysics & Modern)
    ['subject_id' => 4, 'name' => 'special_relativity', 'title' => 'Special Relativity: Time Dilation'],
    ['subject_id' => 4, 'name' => 'mass_energy_equivalence', 'title' => 'E=mc^2'],
    ['subject_id' => 4, 'name' => 'stars_lifecycle', 'title' => 'Life Cycle of Stars'],
    ['subject_id' => 4, 'name' => 'black_holes', 'title' => 'Black Holes and Singularity'],
    ['subject_id' => 4, 'name' => 'big_bang_theory', 'title' => 'Cosmology and Big Bang'],
    ['subject_id' => 4, 'name' => 'dark_matter', 'title' => 'Dark Matter and Energy'],
    ['subject_id' => 4, 'name' => 'quantum_tunnelling', 'title' => 'Quantum Tunnelling'],
    ['subject_id' => 4, 'name' => 'superconductivity', 'title' => 'Superconductors'],
    ['subject_id' => 4, 'name' => 'nanotechnology', 'title' => 'Physics of Nanotechnology'],
    ['subject_id' => 4, 'name' => 'fluid_statics', 'title' => 'Pressure in Fluids'],
    ['subject_id' => 4, 'name' => 'archimedes_principle', 'title' => 'Archimedes\' Principle'],
    ['subject_id' => 4, 'name' => 'bernoulli_principle', 'title' => 'Fluid Dynamics: Bernoulli'],
    ['subject_id' => 4, 'name' => 'pascals_law', 'title' => 'Hydraulics and Pascal\'s Law'],
    ['subject_id' => 4, 'name' => 'orbital_mechanics', 'title' => 'Satellites and Orbits'],

            ['subject_id'=>5,'name'=>'atoms','title'=>'Atoms'],
            ['subject_id'=>5,'name'=>'chemical_reactions','title'=>'Chemical Reactions'],

            ['subject_id'=>6,'name'=>'cells','title'=>'Cells'],
            ['subject_id'=>6,'name'=>'dna','title'=>'DNA'],

            ['subject_id'=>14,'name'=>'algorithms','title'=>'Algorithms'],
            ['subject_id'=>14,'name'=>'variables','title'=>'Variables'],
            ['subject_id'=>14,'name'=>'loops','title'=>'Loops']

        ];

        foreach ($topics as $topic) {

            Topic::create($topic);

        }

    }
}
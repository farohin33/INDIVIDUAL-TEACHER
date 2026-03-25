# AI Teacher — Intelligent Learning Platform

AI Teacher is an intelligent education platform built with **Laravel** that automatically generates **lessons**, **tests**, and **explanations of mistakes** using AI.
The goal of the project is to create a modern learning environment similar to **Duolingo + Khan Academy + ChatGPT**, where students can study school subjects interactively.

This project is designed for **education competitions, research projects, and AI-based learning systems**.

---

# Features

### AI Lesson Generation

The system automatically generates structured lessons for any topic using AI.

Each lesson contains:

* Explanation of the topic
* Key concepts
* Examples
* Summary

---

### AI Test Generation

After completing a lesson, the student can generate a test.

The AI automatically creates:

* 10 questions
* 4 answer options
* 1 correct answer

---

### AI Mistake Explanation

If a student answers incorrectly, the AI explains the mistake like a tutor.

Example:

* Why the answer is wrong
* What concept was misunderstood
* How to solve the problem correctly

---

### Subject Based Learning

Subjects are organized in a sidebar.

Example subjects:

* math
* algebra
* geometry
* physics
* chemistry
* biology
* grammar
* literature
* history
* geography
* programming
* informatics
* statistics
* economics
* law
* astronomy
* ecology
* logic

Each subject contains multiple **topics**.

---

### Topic Navigation

Students can:

* browse subjects
* open topics
* generate lessons
* take tests
* see results

---

### Topic Search

Students can quickly find topics using the search system.

---

### Topic Creation

Teachers or users can create new topics that AI will generate lessons for.

---

# Technology Stack

Backend

* Laravel
* PHP
* MySQL
* REST API
* AI integration (Grok / xAI)

Frontend

* Blade templates
* TailwindCSS
* JavaScript

AI

* Grok (xAI API)

---

# Project Structure

```
app
 ├── Http
 │    ├── Controllers
 │    │     ├── LessonController.php
 │    │     ├── TestController.php
 │    │     ├── TopicController.php
 │    │     ├── SubjectController.php
 │    │
 │
 ├── Models
 │     ├── User.php
 │     ├── Subject.php
 │     ├── Topic.php
 │     ├── Lesson.php
 │     ├── Test.php
 │     ├── Question.php
 │     ├── Answer.php
 │     ├── TestResult.php
 │     ├── StudentProgress.php
 │
 ├── Services
 │     └── AI
 │           ├── GrokService.php
 │           ├── LessonGeneratorService.php
 │           ├── TestGeneratorService.php
 │           ├── MistakeExplanationService.php
```

---

# Database Tables

The project uses several core tables:

users
subjects
topics
lessons
tests
questions
answers
test_results
student_progress

Relationships:

```
Subject → Topics
Topic → Lesson
Topic → Test
Test → Questions
Question → Answers
User → Test Results
User → Progress
```

---

# Installation

### 1 Install dependencies

```
composer install
```

---

### 2 Configure environment

Copy the environment file

```
cp .env.example .env
```

Edit database settings in `.env`.

---

### 3 Add AI API key

```
XAI_API_KEY=your_key_here
```

---

### 4 Generate application key

```
php artisan key:generate
```

---

### 5 Run migrations

```
php artisan migrate
```

---

### 6 Seed the database

```
php artisan db:seed
```

This will populate:

* subjects
* topics
* demo users

---

### 7 Run the server

```
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```

---

# Usage

1 Open dashboard
2 Choose a subject
3 Select a topic
4 Generate a lesson
5 Study the lesson
6 Start the test
7 See results and explanations

---

# Example Workflow

```
Student selects subject
        ↓
Student opens topic
        ↓
AI generates lesson
        ↓
Student reads lesson
        ↓
Student starts test
        ↓
AI generates 10 questions
        ↓
Student answers
        ↓
AI explains mistakes
```

---

# Future Improvements

Possible improvements for the platform:

* voice AI teacher
* AI video lesson generation
* adaptive learning paths
* progress analytics
* recommendation system
* teacher dashboard
* student performance charts

---

# Educational Purpose

This project demonstrates:

* AI integration in education
* automated content generation
* intelligent tutoring systems
* adaptive learning architecture

It can be used as:

* school project
* research project
* AI education prototype
* startup MVP

---

# Author

AI Teacher Project
Iamatullova Sevara
Nematova Zuhal
Safarzoda Farohin

---
